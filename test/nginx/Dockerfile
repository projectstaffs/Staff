FROM nginx:1.25.3-alpine
EXPOSE 80

#RUN mkdir -p /etc/nginx
#WORKDIR /etc/nginx

COPY ./nginx.conf /etc/nginx/nginx.conf:ro

#if correct need nginx.conf:ro
CMD ["nginx", "-g", "daemon off;", "-c", "/etc/nginx/nginx.conf:ro"] 
