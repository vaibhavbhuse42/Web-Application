<?php
try {
    // === Upload to S3 ===
    $result = $s3->putObject([
        'Bucket'     => $bucketName,
        'Key'        => $fileName,
        'SourceFile' => $filePath,
        'ACL'        => 'public-read'
    ]);

    $s3url = $result->get('ObjectURL');

    // === CloudFront URL replace ===
    $cfurl = str_replace(
        "https://{$bucketName}.s3.{$$region}.amazonaws.com",
        $cloudfrontDomain,
        $s3url
    );

    // === Insert into DB ===
    $sql = "INSERT INTO posts (name, class, city, post, rating, url, cfurl)
            VALUES ('$name', '$class', '$city', '$post', '$rating', '$s3url', '$cfurl')";

    if (mysqli_query($conn, $sql)) {
        echo "<h2>✅ Record Created Successfully!</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Class:</strong> $class</p>";
        echo "<p><strong>City:</strong> $city</p>";
        echo "<p><strong>Post:</strong> $post</p>";
        echo "<p><strong>Rating:</strong> $rating</p>";
        echo "<p>S3 URL: <a href='$s3url' target='_blank'>$s3url</a></p>";
        echo "<p>CloudFront URL: <a href='$cfurl' target='_blank'>$cfurl</a></p>";
    } else {
        echo "❌ DB Error: " . mysqli_error($conn);
    }

} catch (S3Exception $e) {
    echo "❌ S3 Upload Error: " . $e->getMessage();
}
} else {
    echo "❌ File Upload Error: " . $_FILES["file"]["error"];
}
}

mysqli_close($conn);
?>