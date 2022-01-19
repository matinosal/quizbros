document.addEventListener("DOMContentLoaded", async function () {
  const roomID = document.querySelector(".game").getAttribute("data-roomID");
  const userList = document.querySelector(".game__players-holder");
  socketClient = await connectToServer();
  send(socketClient, "newuser", {
    roomid: roomID,
    username: "host",
    usertype: "host",
  });
  socketClient.onmessage = (res) => {
    const serverData = JSON.parse(res.data);
    if (!serverData.action) return;
    switch (serverData.action) {
      case "refresh_users":
        showPlayers(serverData.data);
        break;
    }
  };

  function showPlayers(data) {
    userList.innerHTML = "";
    for (player of data.users) {
      const span = document.createElement("span");
      span.classList.add("player-name");
      span.innerHTML = player;
      userList.append(span);
    }
  }
});
