export const notFound = (req, res, next) => {
    if (req.headers.accept?.includes('text/html')) {
      return res.status(404).send('<h1>404 - Page Not Found</h1>');
    }
    res.status(404).json({ error: '404 Not Found' });
  };
  
  export const errorHandler = (err, req, res, next) => {
    console.error(err.stack);
    res.status(500).json({ error: 'Server Error' });
  };