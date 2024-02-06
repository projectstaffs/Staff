FROM node:18-alpine
EXPOSE 5173

# Create app directory
RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app

COPY ./ /usr/src/app

RUN npm install 

CMD ["npm", "start"]
