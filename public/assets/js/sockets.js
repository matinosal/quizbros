function send(socket, action, data) {
  console.log(action);
  socket.send(
    JSON.stringify({
      action: action,
      data: data,
    })
  );
}

async function connectToServer() {
  const ws = new WebSocket("ws://localhost:3000/ws");
  return new Promise((resolve, reject) => {
    const timer = setInterval(() => {
      if (ws.readyState === 1) {
        clearInterval(timer);
        resolve(ws);
      }
    }, 10);
  });
}

function showPlayers(target, data) {
  target.innerHTML = "";
  for (player of data.users) {
    const span = document.createElement("span");
    span.classList.add("player-name");
    span.innerHTML = player;
    target.append(span);
  }
}
