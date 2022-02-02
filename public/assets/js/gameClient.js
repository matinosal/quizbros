document.addEventListener("DOMContentLoaded", async function () {
  const username = this.querySelector(".game-form__input");
  const roomID = this.querySelector(".one-page").getAttribute("data-roomID");
  const usersBlock = this.querySelector(".game__players");
  const userList = this.querySelector(".game__players-holder");
  let socketClient = await connectToServer();

  socketClient.onmessage = (res) => {
    const serverData = JSON.parse(res.data);
    if (!serverData.action) return;
    switch (serverData.action) {
      case "refresh_users":
        showPlayers(userList, serverData.data);
        break;
    }
  };

  this.querySelector(".game__button").addEventListener(
    "click",
    async function () {
      const user = username.value;
      if (user == "") return;
      username.disabled = true;
      username.value = "";

      socketClient = send(socketClient, "newuser", {
        roomid: roomID,
        username: user,
      });

      document.querySelector(".game__first-step").style.display = "none";
      usersBlock.style.display = "block";
    }
  );
});

function send(socket, action, data) {
  socket.send(
    JSON.stringify({
      action: action,
      data: data,
    })
  );
}
