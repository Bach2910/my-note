<h2 class="add-card mt-5">Create New Student</h2>

<section class="add-card page">
    <form class="form" method="POST" action="index.php?controller=student&action=store" enctype="multipart/form-data">
        <label for="name" class="label">
            <span class="title">Name</span>
            <input
                    class="input-field"
                    type="text"
                    name="name"
                    placeholder="Enter your full name"
                    value="<?= htmlspecialchars($_SESSION['old_input']['name'] ?? '') ?>"

            />
            <?php if (!empty($_SESSION['errors']['name'])): ?>
                <span style="color:red"><?= htmlspecialchars(($_SESSION['errors']['name'])); ?></span>
                <?php unset($_SESSION['errors']['name']); ?>
            <?php endif; ?>
        </label>
        <label for="name" class="label">
            <span class="title">Email</span>
            <input
                    class="input-field"
                    type="text"
                    name="email"
                    placeholder="Enter your email"
                    value="<?= htmlspecialchars($_SESSION['old_input']['email'] ?? '') ?>"

            />
            <?php if (!empty($_SESSION['errors']['email'])): ?>
                <span style="color:red"><?= htmlspecialchars(($_SESSION['errors']['email'])); ?></span>
                <?php unset($_SESSION['errors']['email']); ?>
            <?php endif; ?>
            <?php if (!empty($_SESSION['exitEmail'])): ?>
                <span style="color:red"><?= htmlspecialchars(($_SESSION['exitEmail'])); ?></span>
                <?php unset($_SESSION['exitEmail']); ?>
            <?php endif; ?>
        </label>
        <label for="name" class="label">
            <span class="title">Address</span>
            <input
                    class="input-field"
                    type="text"
                    name="address"
                    placeholder="Enter your address"
                    value="<?= htmlspecialchars($_SESSION['old_input']['address'] ?? '') ?>"
            />
            <?php if (!empty($_SESSION['errors']['address'])): ?>
                <span style="color:red"><?= htmlspecialchars(($_SESSION['errors']['address'])); ?></span>
                <?php unset($_SESSION['errors']['address']); ?>
            <?php endif; ?>
        </label>
        <div class="split">
            <label for="ExDate" class="label">
                <span class="title">Phone</span>
                <input
                        id="ExDate"
                        class="input-field"
                        type="text"
                        name="phone"
                        value="<?= htmlspecialchars($_SESSION['old_input']['phone'] ?? '') ?>"
                />
                <?php if (!empty($_SESSION['errors']['phone'])): ?>
                    <span style="color:red"><?= htmlspecialchars(($_SESSION['errors']['phone'])); ?></span>
                    <?php unset($_SESSION['errors']['phone']); ?>
                <?php endif; ?>
            </label>
            <label for="student_code" class="label">
                <span class="title">Student Code</span>
                <input
                        id="student_code"
                        class="input-field"
                        type="text"
                        name="student_code"
                        value="<?= htmlspecialchars($_SESSION['old_input']['student_code'] ?? '') ?>"
                />
                <?php if (!empty($_SESSION['errors']['student_code'])): ?>
                    <span style="color:red"><?= htmlspecialchars(($_SESSION['errors']['student_code'])); ?></span>
                    <?php unset($_SESSION['errors']['student_code']); ?>
                <?php endif; ?>
                <?php if (!empty($_SESSION['exits'])): ?>
                    <span style="color:red"><?= htmlspecialchars(($_SESSION['exits'])); ?></span>
                    <?php unset($_SESSION['exits']); ?>
                <?php endif; ?>
            </label>
            <label for="cvv" class="label">
                <span class="title">Class</span>
                <select name="class_id" class="input-field">
                    <option value="">__Choose Class__</option>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?= $class['id'] ?>" <?= (isset($_SESSION['old_input']['class_id']) && $_SESSION['old_input']['class_id'] == $class['id']) ? 'selected' : '' ?>>
                            <?= $class['class_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (!empty($_SESSION['errors']['class_id'])): ?>
                    <span style="color:red"><?= htmlspecialchars(($_SESSION['errors']['class_id'])); ?></span>
                    <?php unset($_SESSION['errors']['class_id']); ?>
                <?php endif; ?>
            </label>
        </div>
        <label class="custum-file-upload" for="file">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                    <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                    <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill=""
                              d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                              clip-rule="evenodd" fill-rule="evenodd"></path>
                    </g>
                </svg>
            </div>
            <div class="text">
                <span>Click to upload image</span>
            </div>
            <input id="file" type="file" name="images[]" multiple ><br>
        </label>
        <?php if (!empty($_SESSION['upload_errors'])): ?>
            <span style="color:red"><?php foreach ($_SESSION['upload_errors'] as $error): ?><?= htmlspecialchars($error) ?><?php endforeach; ?></span>
            <?php unset($_SESSION['upload_errors']); ?>
        <?php endif; ?>
        <input class="checkout-btn" type="submit" value="Add"/>
    </form>
</section>
