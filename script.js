document.getElementById("rollButton").addEventListener("click", function () {
  if (isNaN(totalNumber) || totalNumber < 3) {
    alert("Vui lòng nhập một số hợp lệ lớn hơn hoặc bằng 3");
    return;
  }

  const diceElements = [
    document.getElementById("dice1"),
    document.getElementById("dice2"),
    document.getElementById("dice3"),
  ];

  // Start rolling animation
  diceElements.forEach((dice) => dice.classList.add("rolling"));
  const diceResults = randomizeDiceResults(totalNumber, rate1, rate2);

  // Apply results to the dice elements
  diceResults.forEach((result, index) => {
    diceElements[index].textContent = result;
  });
});

function randomizeDiceResults(totalNumber, rate1, rate2) {
  let results = [];
  for (let i = 0; i < 3; i++) {
    results.push(Math.floor(Math.random() * totalNumber) + 1);
  }

  const duplicateChance = Math.random();
  if (duplicateChance < rate1) {
    // 5% chance to have duplicates
    const tripleChance = Math.random();
    if (tripleChance < rate2) {
      // Within duplicates, 50% chance all are the same
      const commonNumber = Math.floor(Math.random() * totalNumber) + 1;
      results = [commonNumber, commonNumber, commonNumber];
    } else {
      // Otherwise, only two are the same
      const duplicateIndex = Math.floor(Math.random() * results.length);
      const commonNumber = Math.floor(Math.random() * totalNumber) + 1;
      results[duplicateIndex] = commonNumber;
      results[(duplicateIndex + 1) % 3] = commonNumber;
    }
  }
  return results;
}
