<h2 class="add-card mt-5">Edit student</h2>
<section class="add-card page">
    <form class="form" method="POST" action="index.php?controller=classes&action=store">
        <label for="name" class="label">
            <span class="title">Name Class</span>
            <input
                    class="input-field"
                    type="text"
                    name="class_name"
                    value="<?= htmlspecialchars($_SESSION['old_input']['class_name'] ?? '') ?>"
                    required/>
        </label>
        <?php if (isset($_SESSION['class_error'])): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($_SESSION['class_error']); ?>
            </div>
            <?php unset($_SESSION['class_error']); ?>
        <?php endif; ?>
        <label for="name" class="label">
            <span class="title">Description</span>
            <input
                    class="input-field"
                    type="text"
                    name="description"
                    value="<?= htmlspecialchars($_SESSION['old_input']['description'] ?? '') ?>"
                    required/>
        </label>
        <input class="checkout-btn" type="submit" value="Add"/>
    </form>
</section>


