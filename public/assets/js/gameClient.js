document.addEventListener("DOMContentLoaded", function () {
  const username = this.querySelector(".game-form__input");
  const roomID = this.querySelector(".one-page").getAttribute("data-roomID");
  let socketClient = {};

  this.querySelector(".game__button").addEventListener(
    "click",
    async function () {
      const user = username.value;
      console.log(user);
      if (user == "") return;
      username.disabled = true;
      username.value = "";

      socketClient = await connectToServer();
      send(socketClient, "newuser", { roomid: roomID, username: user });

      socketClient.onmessage = (serverData) => {
        const data = JSON.parse(MessageEvent.data);
        if (!data.action) return;
        switch (data.action) {
          case "refresh_users":
            console.log(data);
            break;
        }
      };
    }
  );
});

function send(socket, action, data) {
  console.log(action);
  socket.send(
    JSON.stringify({
      action: action,
      data: data,
    })
  );
}
