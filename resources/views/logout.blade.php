@auth
<div class="logout-container">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-button">
            Logout
        </button>
    </form>
</div>
@endauth
