<style>
    :root {
        --primary-color: #00ffff;
        --background-color: #ffffff;
        --text-color: #000000;
    }

    body.dark-mode {
        --primary-color: #00ffff;
        --background-color: #1a1a1a;
        --text-color: #ffffff;
    }

    body {
        background-color: var(--background-color);
        color: var(--text-color);
        transition: background-color 0.3s, color 0.3s;
    }

    .sidebar {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: var(--background-color);
        overflow-x: hidden;
        padding-top: 20px;
        border-right: 1px solid var(--primary-color);
        display: flex;
        flex-direction: column;
    }

    .sidebar a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: var(--text-color);
        display: block;
        position: relative;
        overflow: hidden;
        text-transform: capitalize;
    }

    .sidebar a::before {
        content: '';
        position: absolute;
        left: -100%;
        height: 2px;
        width: 100%;
        background-color: var(--primary-color);
        transition: left 0.3s ease-in-out;
        bottom: 0;
    }

    .sidebar a:hover::before {
        left: 0;
    }

    .main-content {
        margin-left: 250px;
        padding: 20px;
    }

    .neon-nav {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 10px;
        background-color: var(--background-color);
    }

    .toggle-dark-mode {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    .toggle-dark-mode input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: var(--text-color);
        transition: .4s;
        border-radius: 20px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 2px;
        bottom: 2px;
        background-color: var(--background-color);
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: var(--primary-color);
    }

    input:checked + .slider:before {
        transform: translateX(20px);
    }

    .logout-button {
        background-color: var(--primary-color);
        color: var(--background-color);
        border: none;
        padding: 5px 10px;
        margin-right: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 14px;
    }

    .logout-button:hover {
        background-color: var(--background-color);
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
    }
</style>

<div class="sidebar">
    <a href="">my course</a>
    <a href="">attendance</a>
    <a href="">my result</a>
    <a href="">add teacher</a>
    <a href="">view teacher</a>
    <a href="">add course</a>
    <a href="">view course</a>
</div>

<div class="main-content">
    <nav class="neon-nav">
        <a class="logout-button" href="logout.php">Logout</a>
        <label class="toggle-dark-mode">
            <input type="checkbox" id="darkModeToggle">
            <span class="slider"></span>
        </label>
    </nav>
    <!-- Your main content goes here -->
</div>

<script>
    // Check for saved dark mode preference
    if (localStorage.getItem('darkMode') === 'enabled') {
        document.body.classList.add('dark-mode');
        document.getElementById('darkModeToggle').checked = true;
    }

    // Toggle dark mode
    document.getElementById('darkModeToggle').addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('dark-mode');
            localStorage.setItem('darkMode', 'enabled');
        } else {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('darkMode', null);
        }
    });
</script>
