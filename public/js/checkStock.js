let checkStockBtn = document.querySelector('#checkStockBtn');
let stockText = document.querySelector('#stockText');
checkStockBtn.addEventListener('click', ()=>{
    console.log(checkStockBtn.getAttribute('path'));
    checkStock()
})

function checkStock(){
    fetch(`http://localhost:8000/articles/checkstock?name=${checkStockBtn.getAttribute('path')}`).then(res => res.text()
    ).then(data => {
        stockText.innerHTML = "";
        stockText.innerHTML = "Quantità rimasta: " + data;
    })
}