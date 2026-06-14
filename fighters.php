<?php include 'header.php'; include 'config/db.php'; ?>

<div class="container">
    <h1>მოკრივეები</h1>

    <div class="grid">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM fighters ORDER BY id DESC");

        while($row = mysqli_fetch_assoc($result)):
            $image = !empty($row['image']) ? $row['image'] : 'default.jpg';
        ?>

        <div class="card">

            <img src="images/<?= htmlspecialchars($image) ?>"
                 alt="<?= htmlspecialchars($row['name']) ?>"
                 class="fighter-img">

            <h3><?= htmlspecialchars($row['name']) ?></h3>

            <p><b>ქვეყანა:</b> <?= htmlspecialchars($row['country']) ?></p>

            <p><b>წონა:</b> <?= htmlspecialchars($row['weight']) ?></p>

            <p>
                <b>მოგება:</b> <?= (int)$row['wins'] ?> |
                <b>წაგება:</b> <?= (int)$row['losses'] ?>
            </p>

            <p><?= htmlspecialchars($row['description']) ?></p>

        </div>

        <?php endwhile; ?>
    </div>
</div>

<?php include 'footer.php'; ?>