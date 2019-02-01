<div class="col-sm-4">
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
    <img class="card-img-top" src="/images/goods/<?= $item->image?>">
    <div class="card-body">

        <h5 class="card-title"><a href="/show?id=<?= $item->id?>"><?= $item->name?></a></h5>
        <p class="card-text"><?= $item->description?>.</p>
    </div>
    <div class="card-footer bg-transparent border-primary"><?= $item->price?>
    	<form action="index.php" method="post">
			<label for="item" >Количество :</label>
				<input type="number" name="item" id= "item" size="2">
				<input hidden name="id" value =<?= $item->id?>>
			<button type="submit">Купить</button>		
		</form>

    </div>
</div>
</div>
