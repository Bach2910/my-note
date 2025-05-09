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
                    />
        </label>
        <?php if (isset($_SESSION['class_error'])): ?>
            <span style="color:red">
                <?= htmlspecialchars($_SESSION['class_error']); ?>
            </span>
            <?php unset($_SESSION['class_error']); ?>
        <?php elseif (!empty($_SESSION['errors']['class_name'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_SESSION['errors']['class_name']); ?>
            </div>
            <?php unset($_SESSION['errors']['class_name']); ?>
        <?php endif; ?>
        <label for="name" class="label">
            <span class="title">Description</span>
            <input
                    class="input-field"
                    type="text"
                    name="description"
                    value="<?= htmlspecialchars($_SESSION['old_input']['description'] ?? '') ?>"
                    />
            <?php if (!empty($_SESSION['errors']['description'])): ?>
            <span style="color:red">
                <?= htmlspecialchars($_SESSION['errors']['description']); ?>
            </span>
            <?php unset($_SESSION['errors']['description']); ?>
            <?php endif; ?>
        </label>
        <input class="checkout-btn" type="submit" value="Add"/>
    </form>
</section>


