if [ -z "$RELEASE_COMMAND" ]; then
  # We are NOT in a temporary VM, run as normal...
else
exec('php /var/www/html/artisan migrate --force');
  # We are in the temporary VM created
  # for release commands...
fi
