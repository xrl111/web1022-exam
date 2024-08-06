
document.getElementById("rollButton").addEventListener("click", function (event) {
  const totalNumber = document.getElementById("totalNumber").value;
  if (totalNumber < 3) {
    alert("Số phải lớn hơn hoặc bằng 3");
    event.preventDefault();
    return;
  }

  let dice1 = Math.floor(Math.random() * totalNumber) + 1;
  let dice2 = Math.floor(Math.random() * totalNumber) + 1;
  let dice3 = Math.floor(Math.random() * totalNumber) + 1;

  document.getElementById("dice1").textContent = dice1;
  document.getElementById("dice2").textContent = dice2;
  document.getElementById("dice3").textContent = dice3;

  document.getElementById('content1').value = document.getElementById('dice1').textContent;
  document.getElementById('content2').value = document.getElementById('dice2').textContent;
  document.getElementById('content3').value = document.getElementById('dice3').textContent;

  document.getElementById(
    "result"
  ).textContent = `Kết quả: ${dice1}, ${dice2}, ${dice3}`;
});
