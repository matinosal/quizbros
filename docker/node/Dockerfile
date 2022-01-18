FROM node:16

# Create app directory
WORKDIR /var/www/html
# Install app dependencies
# A wildcard is used to ensure both package.json AND package-lock.json are copied
# where available (npm@5+)
COPY package.json /var/www/html

RUN npm install
RUN npm i -g nodemon
# If you are building your code for production
# RUN npm ci --only=production

# Bundle app source
COPY . /var/www/html

EXPOSE 3000
CMD [ "nodemon", "./server.js" ]