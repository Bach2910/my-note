<h2 class="add-card mt-5">Edit student</h2>
<section class="add-card page">
    <form class="form" method="POST" action="index.php?controller=classes&action=store">
        <label for="name" class="label">
            <span class="title">Name Class</span>
            <input
                    class="input-field"
                    type="text"
                    name="class_name"
                    required/>
        </label>
        <label for="name" class="label">
            <span class="title">Description</span>
            <input
                    class="input-field"
                    type="text"
                    name="description"
                    required/>
        </label>
        <input class="checkout-btn" type="submit" value="Add"/>
    </form>
</section>


