<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bulma.min.css') }}">
    <title>Your Notes - Notey</title>
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
                    <a class="button is-rounded is-light"
                    href={{ route('notes.create') }}>
                      Add Note
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </nav>

        <div class="columns my-2 is-multiline">
            @foreach ($notes as $note)
            @php($color = $note->props['color'])
                <div class="column is-3">
                    <a href={{ route('notes.show', ['note'=>$note->id]) }}>
                        <div
                        @class(['card',
                        'has-background-info' => ($color === 'Blue'),
                        'has-background-success' => ($color === 'Green'),
                        'has-background-danger' => ($color === 'Red'),
                        'has-background-warning' => ($color === 'Yellow')
                        ])
                        style="min-height: 150px !important;max-height: 150px !important;">
                            <div class="card-content">
                              <div class="content">
                                  <p class="title is-size-5">{{ $note->title }}</p>
                                  <p class="subtitle is-size-6">{{ $note->content }}</p>
                              </div>
                            </div>
                        </div>
                    </a>

                    <form action="{{ route('notes.delete', ['note'=>$note->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit"
                            class="button my-2 is-danger is-small is-outlined is-rounded"
                            value="delete">
                    </form>
                </div>
            @endforeach
        </div>
    </section>
</body>
</html>