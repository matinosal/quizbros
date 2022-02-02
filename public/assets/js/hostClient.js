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
        showPlayers(userList, serverData.data);
        break;
    }
  };
});
