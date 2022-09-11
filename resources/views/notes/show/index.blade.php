<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}">
    <title>Viewing Note - Notey</title>
</head>
<body>
    <section class="section">
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <p class="title mx-2">ColorNote</p>
              </a>
            </div>
          
              <div class="navbar-end">
                <div class="navbar-item">
                  <div class="buttons">
                    <a class="button is-dark is-rounded"
                    href={{ route('notes.edit', ['note' => $note->id]) }}>
                      Edit
                    </a>
                    <a class="button is-rounded is-light"
                    href={{ route('notes.home') }}>
                      Home
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </nav>

          <div class="section">
            <div @class([
                "notification",
                "is-danger"
            ])
                style="min-height: 300px !important;max-height: 340px !important;">
                <p class="title">{{ $note->title }}</p>
                <p class="subtitle">{{ $note->content }}</p>
            </div>
          </div>
    </section>
</body>
</html>