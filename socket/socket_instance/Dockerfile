FROM node:18-alpine
EXPOSE 3000

RUN mkdir -p /usr/src/app

WORKDIR /usr/src/app

COPY ./ /usr/src/app

RUN npm install 

CMD ["npm", "start"]
