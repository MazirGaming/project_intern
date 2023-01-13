window.onload = function() 
{   
    total = 0;

    var quantity = document.querySelectorAll(".qty");
    var subTotal = document.querySelectorAll(".subtotal");
    var price = document.querySelectorAll(".price");
    var totalElement = document.querySelector(".total");

    for (let i = 0; i < price.length; i++) {
        subTotal[i].textContent = quantity[i].value * Number(price[i].textContent)
    }
    
    for (let i = 0; i < quantity.length; i++) {
        quantity[i].addEventListener('change', updateValue);
        function updateValue(e) {
            total = 0;
            subTotal[i].textContent = quantity[i].value * Number(price[i].textContent);
            for (let i = 0; i < subTotal.length; i++) {
                total += Number(subTotal[i].textContent)
                totalElement.textContent = total;
            }
        }
        
        total += Number(subTotal[i].textContent)
        totalElement.textContent = total;
    }
}