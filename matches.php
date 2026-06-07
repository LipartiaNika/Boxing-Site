<?php include 'header.php'; include 'config/db.php'; ?>
<div class="container">
    <h1>ბრძოლები</h1>
    <table class="table">
        <tr><th>მოკრივე 1</th><th>მოკრივე 2</th><th>თარიღი</th><th>ლოკაცია</th><th>შედეგი</th></tr>
        <?php $result = mysqli_query($conn, "SELECT * FROM matches ORDER BY match_date DESC"); while($row=mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= htmlspecialchars($row['fighter_one']) ?></td>
            <td><?= htmlspecialchars($row['fighter_two']) ?></td>
            <td><?= htmlspecialchars($row['match_date']) ?></td>
            <td><?= htmlspecialchars($row['location']) ?></td>
            <td><?= htmlspecialchars($row['result']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
<?php include 'footer.php'; ?>
