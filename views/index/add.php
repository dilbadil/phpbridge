<?php $this->layout('template', ['title' => 'Add Page']) ?>

<h2>New Topic</h2>
<form action="/topic/add" method="POST">
    <label>
        Title: <input type="text" name="title">
    </label>
    <br>
    <label>
        Description:
        <br>
        <textarea name="description" cols="50" rows="20"></textarea>
    </label>
    <br>
    <input type="submit" class="btn btn-primary" value="Add Topic">
</form>
