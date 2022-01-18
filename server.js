const WebSocket = require("ws");
const config = require("./config.js");
const express = require("express");
const { Client } = require("pg");

const app = express();
const PORT = 3000;

const client = new Client({
  connectionString: config.URI,
  ssl: {
    rejectUnauthorized: false,
  },
});

app.get("/", async function (req, res) {
  client.connect();
  const arr = await client.query("SELECT * FROM users;");
  await client.end();
  res.send({ data: arr });
});

app.listen(PORT, function () {
  console.log(`Example app listening on port ${PORT}!!`);
});

// const wss = new WebSocket.Server({ port: 3000 });
// const activeRooms = new Map();
