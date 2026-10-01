/* ============================================================
   MTs  MAKARA KUR — Server statis + API galeri dokumentasi
   Tanpa dependensi: hanya modul bawaan Node.js.
   Database: file galeri.json + foto di assets/galeri/
   Jalankan:  node server.js   →  http://localhost:3000
   ============================================================ */
"use strict";

const http = require("http");
const fs = require("fs");
const path = require("path");
const crypto = require("crypto");

const PORT = Number(process.env.PORT) > 0 ? Number(process.env.PORT) : 3000;
const ROOT = __dirname;
const GALLERY_DIR = path.join(ROOT, "assets", "galeri");
const DB_FILE = path.join(ROOT, "galeri.json");
const MAX_BODY = 15 * 1024 * 1024; // 15 MB per request

fs.mkdirSync(GALLERY_DIR, { recursive: true });
if (!fs.existsSync(DB_FILE)) fs.writeFileSync(DB_FILE, "[]");

/* ---------- Database JSON sederhana ---------- */
const readDB = () => {
  try { return JSON.parse(fs.readFileSync(DB_FILE, "utf8")); }
  catch { return []; }
};
const writeDB = (photos) => {
  const tmp = DB_FILE + ".tmp";
  fs.writeFileSync(tmp, JSON.stringify(photos, null, 2));
  fs.renameSync(tmp, DB_FILE); // atomic-ish
};

/* ---------- Helpers ---------- */
const MIME = {
  ".html": "text/html; charset=utf-8", ".css": "text/css; charset=utf-8",
  ".js": "text/javascript; charset=utf-8", ".json": "application/json; charset=utf-8",
  ".png": "image/png", ".jpg": "image/jpeg", ".jpeg": "image/jpeg",
  ".gif": "image/gif", ".webp": "image/webp", ".svg": "image/svg+xml",
  ".ico": "image/x-icon", ".woff2": "font/woff2",
};

const sendJSON = (res, code, data) => {
  res.writeHead(code, { "Content-Type": "application/json; charset=utf-8" });
  res.end(JSON.stringify(data));
};

const readBody = (req) =>
  new Promise((resolve, reject) => {
    let size = 0;
    const chunks = [];
    req.on("data", (c) => {
      size += c.length;
      if (size > MAX_BODY) { reject(new Error("too_large")); req.destroy(); return; }
      chunks.push(c);
    });
    req.on("end", () => resolve(Buffer.concat(chunks)));
    req.on("error", reject);
  });

/* ---------- API: /api/fotos ---------- */
async function handleApi(req, res, url) {
  if (!/^\/api\/fotos(\/.+)?$/.test(url.pathname)) return sendJSON(res, 404, { error: "not_found" });

  if (req.method === "GET") {
    return sendJSON(res, 200, readDB());
  }

  if (req.method === "POST") {
    try {
      const body = JSON.parse((await readBody(req)).toString("utf8"));
      const m = /^data:image\/(png|jpe?g|webp|gif);base64,(.+)$/.exec(body.data || "");
      if (!m) return sendJSON(res, 400, { error: "invalid_image" });

      const ext = m[1] === "jpeg" ? "jpg" : m[1];
      const name = `${Date.now()}-${crypto.randomBytes(4).toString("hex")}.${ext}`;
      fs.writeFileSync(path.join(GALLERY_DIR, name), Buffer.from(m[2], "base64"));

      const photos = readDB();
      const photo = {
        id: name,
        src: `assets/galeri/${name}`,
        caption: String(body.caption || "").slice(0, 200),
        createdAt: Date.now(),
      };
      photos.push(photo);
      writeDB(photos);
      return sendJSON(res, 201, photo);
    } catch (err) {
      const code = err.message === "too_large" ? 413 : 400;
      return sendJSON(res, code, { error: err.message });
    }
  }

  if (req.method === "DELETE") {
    const id = decodeURIComponent(url.pathname.split("/").pop() || "");
    const photos = readDB();
    const idx = photos.findIndex((p) => p.id === id);
    if (idx === -1) return sendJSON(res, 404, { error: "not_found" });
    const [removed] = photos.splice(idx, 1);
    writeDB(photos);
    fs.unlink(path.join(GALLERY_DIR, removed.id), () => { });
    return sendJSON(res, 200, { ok: true });
  }

  res.writeHead(405, { Allow: "GET, POST, DELETE" });
  return res.end();
}

/* ---------- Static files ---------- */
function serveStatic(req, res, url) {
  let file = url.pathname === "/" ? "/index.html" : decodeURIComponent(url.pathname);
  const full = path.normalize(path.join(ROOT, file));
  if (!full.startsWith(ROOT)) { res.writeHead(403); return res.end(); }

  fs.readFile(full, (err, buf) => {
    if (err) { res.writeHead(404, { "Content-Type": "text/plain" }); return res.end("404"); }
    res.writeHead(200, {
      "Content-Type": MIME[path.extname(full).toLowerCase()] || "application/octet-stream",
      "Cache-Control": file.startsWith("/assets/galeri/") ? "public, max-age=604800" : "no-cache",
    });
    res.end(buf);
  });
}

http.createServer(async (req, res) => {
  const url = new URL(req.url, `http://${req.headers.host || "localhost"}`);
  try {
    if (url.pathname.startsWith("/api/")) return await handleApi(req, res, url);
    return serveStatic(req, res, url);
  } catch {
    sendJSON(res, 500, { error: "server_error" });
  }
}).listen(PORT, () => {
  console.log(`MTs MAKARA KUR → http://localhost:${PORT}`);
  console.log(`Galeri: ${GALLERY_DIR}  |  DB: ${DB_FILE}`);
});
