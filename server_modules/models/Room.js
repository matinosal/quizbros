class Room {
  constructor(roomId) {
    this.roomId = roomId;
    this.users = [];
  }
  addUserToRoom = (uuid, username) => {
    this.users.push({ uuid: uuid, username: username });
  };
}
