import React from 'react';
import { router } from '@inertiajs/react';

export default function Home({ name }) {

  const handleLogout = () => {
    router.post('/logout', {}, {
      onFinish: () => {
        router.visit('/');
      }
    });
  };

  return (
    <div>
        <h1 className='text-blue-400'>hello {name}</h1>
        <button onClick={handleLogout}>Logout here</button>
    </div>
  )
}
