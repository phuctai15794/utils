# 1. Create React App

1 - npx create-react-app my-app
2 - npm init react-app my-app

# 2. Create repository on Github

# 3. Install gh-pages package

npm i gh-pages --save-dev

# 4. Add key homepage in the top of file package.json

"homepage": "https://phuctai15794.github.io/my-app",

# 5. Add 2 lines in key "scripts" of file package.json

"predeploy": "npm run build",
"deploy": "gh-pages -d build",

# 6. Run git commands

1/ git init
2/ git remote add origin https://github.com/phuctai15794/my-app.git
3/ git add .
4/ git commit -m 'commit message'
5/ npm run deploy