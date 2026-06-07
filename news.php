<?php include 'header.php'; include 'config/db.php'; ?>
<div class="container">
    <h1>სიახლეები</h1>
    <div class="grid">
        <?php $result = mysqli_query($conn, "SELECT * FROM news ORDER BY created_at DESC"); while($row=mysqli_fetch_assoc($result)): ?>
        <div class="card">
            <h3><?= htmlspecialchars($row['title']) ?></h3>
            <p><?= htmlspecialchars($row['description']) ?></p>
            <p class="small"><?= htmlspecialchars($row['created_at']) ?></p>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php include 'footer.php'; ?>
