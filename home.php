<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>National Brighteen Association</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    /* Base Styles */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #333;
        background-color: #f8f9fa;
    }
    
    /* Improved Hero Section */
    .hero {
      background-image: url("nba picture/logo2.jpg");
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center top;
      height: 100vh;
      position: relative;
      display: flex;
      align-items: flex-end;
      justify-content: center;
      text-align: center;
      padding-bottom: 40px;
      color: #000;
    }


.hero .container {
    position: relative;
    z-index: 2;
    margin-bottom: 2rem;
}
    
    .hero h1 {
        font-size: 3.5rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        animation: fadeInUp 1s ease-out;
    }
    
    /* Enhanced Card Design */
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 1.5rem;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .card-title {
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 1rem;
    }
    
    /* Goals Section Enhancements */
    .goal-icon {
      text-align: center;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #1d428a; /* NBA blue */
        
     
    }
    
    /* Section Styling */
    section {
        padding: 4rem 0;
    }
    
    section h2 {
        font-weight: 700;
        margin-bottom: 2.5rem;
        position: relative;
        display: inline-block;
    }
    
    section h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: #1d428a;
    }
    
    /* Navbar Improvements */
    .navbar {
        padding: 0.8rem 1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-brand {
        font-weight: 600;
    }
    
    .nav-link {
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: color 0.3s ease;
    }
    
    .nav-link:hover {
        color: #1d428a !important;
    }
    
    /* Contact Section */
    #contact {
        background-color: #1d428a;
        color: white;
    }
    
    #contact .form-control {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        padding: 0.8rem 1rem;
    }
    
    #contact .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
    }
    
    /* Footer */
    footer {
        background-color: #2c3e50;
        padding: 2rem 0;
    }
    
    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem;
        }
        
        section {
            padding: 3rem 0;
        }
    }
    
    /* Loading States */
    .loading-spinner {
        width: 3rem;
        height: 3rem;
        border-width: 0.2rem;
    }
    
    /* Error Messages */
    .error-message {
        padding: 1.5rem;
        border-radius: 8px;
    }
    
    /* Button Enhancements */
    .btn {
        padding: 0.6rem 1.5rem;
        font-weight: 500;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background-color: #1d428a;
        border-color: #1d428a;
    }
    
    .btn-primary:hover {
        background-color: #14316b;
        border-color: #14316b;
        transform: translateY(-2px);
    }
    
    /* Social Icons */
    .fab {
        transition: transform 0.3s ease;
    }
    
    .fab:hover {
        transform: scale(1.2);
    }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="nba picture/logo.jpg" alt="Logo" width="40" height="40" class="me-2 rounded-circle" />
      National Brighteen Association
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#goals">Our Goals</a></li>
        <li class="nav-item"><a class="nav-link" href="#news">News</a></li>
        <li class="nav-item"><a class="nav-link" href="#members">Our Members</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero">
  <div class="container">
    <h1 class="display-4 fw-bold">A Dream For Enlighten Nation</h1>
  </div>
</section>

<!-- Goals Section -->
<section id="goals" class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Our Goals & Objectives</h2>
    <div class="row g-4">
      <?php
      $goals = [
        ["📚", "Development of Moral Awareness", "Promote patriotism, morality, and social responsibility through educational and cultural programs."],
        ["🏫", "Education for All", "Ensure accessible education through campaigns and support to underprivileged children."],
        ["💡", "Enhancing Skills", "Develop youth through training in modern technology and innovation."],
        ["👩‍🏫", "Women's Education Empowerment", "Empower women with education and vocational training."],
        ["🚫", "Drug-Free Society", "Raise awareness and campaign against drugs and anti-social behaviors."],
        ["📖", "Community Libraries", "Establish local libraries to expand access to knowledge."],
        ["🌪️", "Disaster Response", "Support disaster-affected people and emergency response preparation."],
        ["🌱", "Environmental Protection", "Run tree-planting and awareness campaigns."],
        ["⚖️", "Human Rights & Justice", "Promote rights awareness and campaign for a just society."],
        ["🤝", "Social Harmony", "Stand against inequality and discrimination through community engagement."]
      ];

      foreach ($goals as [$icon, $title, $desc]) {
        echo '
        <div class="col-md-4">
          <div class="card h-100">
            <div class="card-body text-center">
              <div class="goal-icon mb-2">'.htmlspecialchars($icon).'</div>
              <h5 class="card-title">'.htmlspecialchars($title).'</h5>
              <p class="card-text">'.htmlspecialchars($desc).'</p>
            </div>
          </div>
        </div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- News Section -->
<section id="news" class="bg-light py-5">
  <div class="container">
    <h2 class="text-center mb-4">Latest News</h2>
    <div class="row g-4" id="news-container">
      <div class="col-12 text-center">
        <div class="spinner-border text-primary loading-spinner" role="status">
          <span class="visually-hidden">Loading news...</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Members Section -->
<section id="members" class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Our Members</h2>
    <div class="row g-4" id="member-list">
      <div class="col-12 text-center">
        <div class="spinner-border text-primary loading-spinner" role="status">
          <span class="visually-hidden">Loading members...</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="bg-dark text-white py-5">
  <div class="container">
    <h2 class="text-center mb-4">Contact Us</h2>
    <form id="contactForm" method="POST" action="send_contact.php">
      <div class="row g-3">
        <div class="col-md-6">
          <input type="text" name="name" class="form-control" placeholder="Your Name" required />
        </div>
        <div class="col-md-6">
          <input type="email" name="email" class="form-control" placeholder="Your Email" required />
        </div>
        <div class="col-12">
          <textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
        </div>
        <div class="col-12 text-center">
          <button class="btn btn-primary mt-2" type="submit">Send Message</button>
        </div>
      </div>
    </form>
    <div class="text-center mt-4">
      <a href="https://www.facebook.com/nationalbrightenassociation24" class="text-white me-3" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-facebook fa-lg"></i>
      </a>
      <a href="https://www.linkedin.com/in/nationalbrightenassociation-nba24" class="text-white" target="_blank" rel="noopener noreferrer">
        <i class="fab fa-linkedin fa-lg"></i>
      </a>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-secondary text-white text-center py-3">
  <p class="mb-0">&copy; 2025 National Brighteen Association | All Rights Reserved</p>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Enhanced fetch with timeout
async function fetchWithTimeout(resource, options = {}) {
    const { timeout = 8000 } = options;
    const controller = new AbortController();
    const id = setTimeout(() => controller.abort(), timeout);
    
    try {
        const response = await fetch(resource, {
            ...options,
            signal: controller.signal  
        });
        clearTimeout(id);
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return await response.json();
    } catch (error) {
        clearTimeout(id);
        throw error;
    }
}

// Load News with enhanced error handling
async function loadNews() {
    const container = document.getElementById('news-container');
    
    try {
        // Show loading state
        container.innerHTML = `
            <div class="col-12 text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading news...</span>
                </div>
                <p class="mt-2">Loading latest news...</p>
            </div>`;
        
        const response = await fetch('fetch_news.php');
        
        // First check if response is OK
        if (!response.ok) {
            throw new Error(`Server returned ${response.status} status`);
        }
        
        // Get response as text first for better error handling
        const text = await response.text();
        
        // Try to parse JSON
        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
            console.error('Invalid JSON received:', text);
            throw new Error('Server returned invalid data format');
        }
        
        // Check for API-level errors
        if (data.status === 'error') {
            throw new Error(data.message || 'Server reported an error');
        }
        
        // Check if data exists
        if (!data.data || data.data.length === 0) {
            container.innerHTML = `
                <div class="col-12 text-center py-4">
                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                    <h5>No news available</h5>
                    <p>Please check back later for updates</p>
                </div>`;
            return;
        }
        
        // Display news items
        container.innerHTML = data.data.map(news => `
            <div class="col-md-4 mb-4">
                <div class="card h-100 news-card">
                    ${news.image ? `
                    <img src="uploads/${news.image}" class="card-img-top" 
                         alt="${news.title}" 
                         onerror="this.src='default.jpg'">` : ''}
                    <div class="card-body">
                        <h5 class="card-title">${news.title || 'Untitled News'}</h5>
                        <div class="card-text mb-3">
                            ${news.content ? `
                            <p class="news-excerpt">${news.content.substring(0, 120)}...</p>
                            ` : '<p class="text-muted">No content available</p>'}
                        </div>
                        ${news.date ? `<p class="text-muted small"><i class="far fa-clock"></i> ${news.date}</p>` : ''}
                    </div>
                    <div class="card-footer bg-transparent">
                        <button class="btn btn-outline-primary btn-sm read-more-btn"
                                onclick="showFullNews(${news.id})">
                            Read More <i class="fas fa-chevron-right ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        `).join('');
        
    } catch (error) {
        console.error('News loading failed:', error);
        container.innerHTML = `
            <div class="col-12">
                <div class="alert alert-danger">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>
                            <strong>Failed to load news</strong>
                            <div class="small">${error.message}</div>
                        </div>
                    </div>
                    <div class="mt-2 text-center">
                        <button onclick="loadNews()" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-sync-alt me-1"></i> Try Again
                        </button>
                    </div>
                </div>
            </div>`;
    }
}

// Function to show full news (to be implemented)
function showFullNews(newsId) {
    // You can implement a modal or redirect here
    window.location.href = `news_detail.php?id=${newsId}`;
}
// Load Members with enhanced error handling
async function loadMembers() {
    const container = document.getElementById('member-list');
    
    try {
        // Show loading state
        container.innerHTML = `
            <div class="col-12 text-center">
                <div class="spinner-border text-primary loading-spinner" role="status">
                    <span class="visually-hidden">Loading members...</span>
                </div>
            </div>`;
        
        const data = await fetchWithTimeout('fetch_member.php');
        
        if (data.status === 'error') {
            throw new Error(data.message || 'Server error while loading members');
        }
        
        if (!data.data || data.data.length === 0) {
            container.innerHTML = `
                <div class="col-12 text-center py-4">
                    <i class="fas fa-users fa-3x mb-3 text-muted"></i>
                    <h5>No members available</h5>
                    <p>Our team information will be available soon</p>
                </div>`;
            return;
        }
        
        // Display member cards
        container.innerHTML = data.data.map(member => `
            <div class="col-md-4">
                <div class="card h-100 text-center">
                    <img src="uploads/${member.image}" class="card-img-top" 
                         alt="${member.name}" 
                         onerror="this.src='default.jpg'">
                    <div class="card-body">
                        <h5 class="card-title">${member.name}</h5>
                        <p class="card-subtitle mb-2 text-muted">${member.position}</p>
                        <p class="card-text">${member.bio}</p>
                        ${member.added_at ? `<p class="text-muted small">Member since ${member.added_at}</p>` : ''}
                    </div>
                </div>
            </div>
        `).join('');
        
    } catch (error) {
        console.error('Members loading error:', error);
        container.innerHTML = `
            <div class="col-12 error-message">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Error loading members:</strong> ${error.message || 'Please try again later'}
                <div class="mt-2">
                    <button class="btn btn-sm btn-primary retry-btn" onclick="loadMembers()">
                        <i class="fas fa-sync-alt me-1"></i> Retry
                    </button>
                </div>
            </div>`;
    }
}

// Contact form handling
async function handleContactForm(e) {
    e.preventDefault();
    const form = e.target;
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    const successMsg = document.getElementById('success-message');
    const errorMsg = document.getElementById('error-message');

    // Reset messages
    if (successMsg) successMsg.classList.add('d-none');
    if (errorMsg) errorMsg.classList.add('d-none');

    try {
        // Show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Sending...`;

        const formData = new FormData(form);
        
        // First validate required fields client-side
        const required = ['name', 'email', 'message'];
        for (const field of required) {
            if (!formData.get(field)) {
                throw new Error(`Please fill in the ${field} field`);
            }
        }

        const response = await fetch(form.action, {
            method: 'POST',
            body: formData
        });

        // Check for HTTP errors
        if (!response.ok) {
            const errorText = await response.text();
            console.error('Server response:', errorText);
            throw new Error(`Server error: ${response.status}`);
        }

        // Parse JSON response
        const result = await response.json();

        if (!result.success) {
            throw new Error(result.message || 'Action failed');
        }

        // Show success
        if (successMsg) {
            successMsg.textContent = result.message;
            successMsg.classList.remove('d-none');
            form.reset();
        }

    } catch (error) {
        console.error('Form submission error:', error);
        
        // Show error message
        const displayError = error.message || 'Failed to send message';
        if (errorMsg) {
            errorMsg.textContent = displayError;
            errorMsg.classList.remove('d-none');
        } else {
            alert(displayError); // Fallback
        }
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    }
}
// Initialize everything when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
    loadNews();
    loadMembers();
    
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactForm);
    }
});
</script>
</body>
</html>


