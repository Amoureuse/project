<div class="col-sm-4">
<div class="card text-white bg-dark mb-3" style="max-width: 12rem;">
    <img class="card-img-top" src="/images/goods/<?= $item->image?>">
    <div class="card-body">
        <h5 class="card-title"><a href="show?id=<?= $item->id?>"><?= $item->name?></a></h5>
        <p class="card-text"><?=$item->description?>.</p>
    </div>
</div>
</div>