<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}">
    <title>Upload File</title>
</head>
<body>
    <section class="section">
        <form method="POST" enctype="multipart/form-data" action="{{ route('upload.store') }}">
            @csrf
            <div class="file is-warning is-boxed">
                <label class="file-label">
                  <input class="file-input" type="file" name="image">
                  <span class="file-cta">
                    <span class="file-icon">
                      <i class="fas fa-cloud-upload-alt"></i>
                    </span>
                    <span class="file-label">
                      Upload file
                    </span>
                  </span>
                </label>
            </div>
            <br>
            <input type="submit" class="button is-succes is-rounded"> 
        </form>
    </section>
</body>
</html>