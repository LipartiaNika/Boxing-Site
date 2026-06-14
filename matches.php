<?php include 'header.php'; include 'config/db.php'; ?>

<div class="container">

    <h1 class="page-title">🥊 მომავალი ბრძოლები</h1>

    <div class="matches-grid">

    <?php
    $result = mysqli_query($conn,"SELECT * FROM matches ORDER BY match_date ASC");

    while($row=mysqli_fetch_assoc($result)):
    ?>

        <div class="match-card">

            <h2><?= htmlspecialchars($row['fighter_one']) ?></h2>

            <div class="vs">⚔️ VS ⚔️</div>

            <h2><?= htmlspecialchars($row['fighter_two']) ?></h2>

            <hr>

            <p>📅 <b>თარიღი:</b> <?= htmlspecialchars($row['match_date']) ?></p>

            <p>📍 <b>ლოკაცია:</b> <?= htmlspecialchars($row['location']) ?></p>

            <p>🏆 <b>სტატუსი:</b> <?= htmlspecialchars($row['result']) ?></p>

        </div>

    <?php endwhile; ?>

    </div>

</div>

<?php include 'footer.php'; ?>