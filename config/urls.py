from django.contrib import admin
from django.urls import path, include
from django.conf import settings
from django.conf.urls.static import static

urlpatterns = [
    path('admin/', admin.site.urls),
    path('api/users/', include('apps.users.urls', namespace='users')),
    path('api/invoices/', include('apps.invoices.urls', namespace='invoices')),
    path('api/xml/', include('apps.xml_parser.urls', namespace='xml')),
]

if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
