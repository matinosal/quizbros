class User {
  USER = "user";
  HOST = "host";
  constructor(userhash, username, type, socket) {
    this.userhash = userhash;
    this.username = username;
    this.type = type;
    this.socket = socket;
  }
}
module.exports = User;
