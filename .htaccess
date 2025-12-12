# =====================================================
# ENABLE REWRITE
# =====================================================
RewriteEngine On

# =====================================================
# ENVIRONMENTS
# =====================================================
SetEnvIf Host "^localhost" IS_LOCAL=1
SetEnvIf Host "^127\.0\.0\.1" IS_LOCAL=1
SetEnvIf Host "amazonaws.com" IS_AWS=1
SetEnvIf Host "aws." IS_AWS=1

# =====================================================
# EXCLUDE ADMIN/BACKEND FROM CLEAN URL RULES
# =====================================================
RewriteCond %{REQUEST_URI} ^/(admin|backend|panel) [NC]
RewriteRule ^ - [L]

# =====================================================
# HIDE .php EXTENSION (ONLY FRONTEND)
# =====================================================
RewriteCond %{ENV:IS_AWS} !^1$
RewriteCond %{THE_REQUEST} \s/([^.]+)\.php[\s?] [NC]
RewriteRule ^ /%1 [R=301,L]

# Internal Rewrite → append .php automatically
RewriteCond %{ENV:IS_AWS} !^1$
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.+)$ $1.php [L,QSA]

# =====================================================
# SECURITY
# =====================================================

# Allow normal files — only block hidden files like .env, .git, .htaccess
<FilesMatch "^\.">
    Require all denied
</FilesMatch>

# Disable directory listing
Options -Indexes

# Default encoding
AddDefaultCharset UTF-8

# Enable Gzip Compression
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css application/javascript
</IfModule>
