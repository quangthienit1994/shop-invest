# Laravel application

## Step DB:
1. Run PHP command: ``php artisan migrate``
2. Run Seed: ``php artisan db:seed``
3. Run command to start: ``php artisan server``
4. Follow URL ``http://localhost:8000``


## Admin page:
URL ``http://localhost:8000/admin/products``

## Product page:
URL ``http://localhost:8000/products/[slug]``

## Note:
1. I don't build the feature to upload images
2. The slug can duplicate, can make the slug like: 'hello-world-1', 'hello-world-2', ...