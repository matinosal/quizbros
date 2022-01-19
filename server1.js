// node_modules //
const WebSocket = require("ws");
const config = require("./server_modules/config.js");
const express = require("express");
const { Client, ClientBase } = require("pg");
// -- Models --- //
const User = require("./server_modules/models/User.js");

const PORT = 3000;
const socketServer = new WebSocket.Server({ port: PORT });

const gameRooms = new Map();
const users = [];
const client = new Client({
  connectionString: config.URI,
  ssl: {
    rejectUnauthorized: false,
  },
});
socketServer.on("connection", (ws) => {
  console.log("Somebody got connected");

  ws.on("message", (request) => {
    const requestData = JSON.parse(request);
    if (!requestData.action) return;
    switch (requestData.action) {
      case "newuser":
        addNewUser(requestData.data, ws);
        const players = users
          .filter((user) => user.type == "user")
          .map((user) => user.username);

        users.forEach((user) => {
          user.socket.send(
            JSON.stringify({
              action: "refresh_users",
              data: { users: players || [] },
            })
          );
        });
    }
  });
});
function addNewUser(data, socket) {
  data.usertype = data.usertype || "user";
  const user = new User(uuidv4(), data.username, data.usertype, socket);
  users.push(user);
}
function uuidv4() {
  return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function (c) {
    let r = (Math.random() * 16) | 0,
      v = c == "x" ? r : (r & 0x3) | 0x8;
    return v.toString(16);
  });
}
// app.get("/", async function (req, res) {
//   client.connect();
//   const arr = await client.query("SELECT * FROM users;");
//   await client.end();
//   res.send({ data: arr });
// });

// app.listen(PORT, function () {
//   console.log(`Example app listening on port ${PORT}!!`);
// });

// const wss = new WebSocket.Server({ port: 3000 });
// const activeRooms = new Map();
