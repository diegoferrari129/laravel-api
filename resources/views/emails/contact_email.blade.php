<div id="contact_email">
    <header>
        <h1>Boolfolio</h1>
    </header>
    <main>
        <p>Nuovo contatto da Boolfolio:</p>
        <ul>
            <li>Name: {{ $lead->name }}</li>
            <li>Surname: {{ $lead->surname }}</li>
            <li>e-mail: {{ $lead->email }}</li>
            <li>Phone: {{ $lead->phone }}</li>
            <li>Content
                {{ $lead->content }}</li>
        </ul>
    </main>
    <footer>
        <p>© 2024 Boolmail</p>
    </footer>
</div>
