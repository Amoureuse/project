<div class="container">
    <div class="account">
        <h2 class="account-in">Оформление заказа</h2>
            <form action="cart/order" method="post">
		<div> 	
		    <span class="mail">Номер телефона:</span>
                    <input type="number" name="phone" > 
		</div>
		<div> 
                    <span class="word">Адресс доставки:</span>
                    <input type="text" name="adress">
		</div>
                <div> 
                    <span class="word">ФИО получателя:</span>
                    <input type="text" name="name">
		</div>
                <div>
                    <button class="btn btn-outline my-2 my-sm-0" type="submit" name="submit">Подтвердить заказ</button>
                </div>
	    </form>
    </div>
</div>