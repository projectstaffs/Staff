FROM minio/minio:latest

EXPOSE 9000
EXPOSE 9009
#EXPOSE 443

# Create app directory
RUN mkdir -p /data
WORKDIR /data

# команда для запуска Minio сервера
CMD ["minio", "server", "--console-address", ":443", "/data"]
