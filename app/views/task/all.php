<form action="../task/add" method="post">
    <input type="text" value="I have to..." onclick="this.value=''" name="task"> <input type="submit" value="add">
</form>
<br/><br/>

<?php $number = 0?>

<?php foreach ($tasks as $task):?>
    <a class="big" href="../task/view/<?=$task->id_task?>">
        <span class="item">
            <?php echo ++$number?>
            <?=$task->task?>
        </span>
    </a><br/>
<?php endforeach ?>