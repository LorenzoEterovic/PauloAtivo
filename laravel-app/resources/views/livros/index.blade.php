<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Pessoal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 2rem;
            background: #f4f7fb;
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        }

        h1 {
            margin-top: 0;
            color: #0f172a;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
        }

        .notice {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            padding: 0.8rem 1rem;
            margin-bottom: 1rem;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .btn-danger {
            background: #dc2626;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 0.85rem;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #eff6ff;
            color: #1e3a8a;
            font-size: 0.95rem;
        }

        td {
            color: #374151;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .empty {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            padding: 1.5rem;
            border-radius: 10px;
            color: #475569;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="top-bar">
                <div>
                    <h1>Gerenciamento de Livros</h1>
                    <p>Biblioteca pessoal com cadastro, edição e exclusão de livros.</p>
                </div>
                <a href="{{ route('livros.create') }}" class="btn">Cadastrar novo livro</a>
            </div>

            @if (session('success'))
                <div class="notice">{{ session('success') }}</div>
            @endif

            @if ($livros->isEmpty())
                <div class="empty">Nenhum livro cadastrado ainda.</div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>ISBN</th>
                            <th>Ano</th>
                            <th>Páginas</th>
                            <th>Editora</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($livros as $livro)
                            <tr>
                                <td>{{ $livro->id }}</td>
                                <td>{{ $livro->titulo }}</td>
                                <td>{{ $livro->autor }}</td>
                                <td>{{ $livro->isbn }}</td>
                                <td>{{ $livro->ano_publicacao }}</td>
                                <td>{{ $livro->numero_paginas }}</td>
                                <td>{{ $livro->editora ?? '-' }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('livros.edit', $livro->id) }}" class="btn">Editar</a>
                                        <form action="{{ route('livros.destroy', $livro->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>
