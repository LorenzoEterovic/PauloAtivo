<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 2rem;
            background: #f4f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 760px;
            margin: 0 auto;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 1.8rem;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        }

        h1 {
            margin-top: 0;
            color: #0f172a;
        }

        .error-box {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.4rem;
        }

        input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .error-text {
            color: #b91c1c;
            font-size: 0.9rem;
            margin-top: 0.4rem;
        }

        .actions {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .btn {
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            padding: 0.8rem 1.1rem;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Cadastrar Livro</h1>

            @if ($errors->any())
                <div class="error-box">
                    <strong>Corrija os erros abaixo:</strong>
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('livros.store') }}" method="POST">
                @csrf

                <div class="field-grid">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
                        @error('titulo')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" id="autor" name="autor" value="{{ old('autor') }}">
                        @error('autor')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}">
                        @error('isbn')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ano_publicacao">Ano de publicação</label>
                        <input type="number" id="ano_publicacao" name="ano_publicacao" value="{{ old('ano_publicacao') }}">
                        @error('ano_publicacao')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="numero_paginas">Número de páginas</label>
                        <input type="number" id="numero_paginas" name="numero_paginas" value="{{ old('numero_paginas') }}">
                        @error('numero_paginas')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="editora">Editora (opcional)</label>
                        <input type="text" id="editora" name="editora" value="{{ old('editora') }}">
                        @error('editora')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="actions">
                    <button type="submit" class="btn">Salvar</button>
                    <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
