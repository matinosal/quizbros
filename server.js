var express = require("express");
var app = express();
const PORT = 3000;
app.all("/secret", function (req, res, next) {
  console.log("Hello from secret");
  next();
});

app.get("/", function (req, res) {
  res.send("Hello World!");
});

app.listen(PORT, function () {
  console.log(`Example app listening on port ${PORT}!!`);
});
