<tr>
    <td><%= obj.book_id %></td>
    <td><img src="/images/<%= obj.image %>" alt="" srcset=""></td>
    <td><%= obj.isbn %></td>
    <td><%= obj.title %></td>
    <td><%= obj.author %></td>
    <td><%= obj.description %></td>
    <td><%= obj.category %>
    </td>
    <td><a class="btn btn-success"><%= obj.avaliable %></a></td>
    <td><a class="btn btn-inverse"><%= obj.total_books %></a></td>
    <td style="display: flex">
        <a href="/edit/book/<%= obj.book_id %>" class="btn btn-primary">Edit</a>
        <form method="POST" action="/delete/book/<%= obj.book_id %>">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
