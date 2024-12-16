import React from 'react';
import { useState, useEffect } from 'react';
import { router } from '@inertiajs/react';

export default function Home({ name, foldersFetched }) {

  const [createFolder, setCreateFolder] = useState(false);
  const [folder, setFolder] = useState({
    title: '',
    description: ''
  });

  useEffect(() => {
    if (!folder) {
      fetchFolders();
    }
  }, []);

  const fetchFolders = () => {
    router.get('/fetch-folder');
  };

  const handleLogout = () => {
    router.post('/logout', {}, {
      onFinish: () => {
        router.visit('/');
      }
    });
  };

  const submitCreateFolder = (event) => {
    event.preventDefault();
    router.post('/create-folder', folder, {
      onFinish: (data) => {
        if (data.data) {
          console.log('Folder created successfully.');
          // return a toast message
          setCreateFolder(false);
        }
      }
    });
  };

  const handleChangeFolderValues = (event) => {
    const keys = event.target.id;
    const values = event.target.value;
    setFolder(folder => ({
      ...folder,
      [keys]: values,
    }));
  };

  const handleCreateFolder = () => {
    setCreateFolder(true);
  };

  return (
    <div className='flex flex-col'>
      <h1 className='text-blue-400'>hello {name}</h1>
      <button className='border-2' onClick={handleCreateFolder}>Create a folder here</button>
      <button onClick={handleLogout} className='border-2'>Logout here</button>
      {
        createFolder &&
        <div>
          <form onSubmit={submitCreateFolder}>
            <div>
              <label htmlFor="title">Title: </label>
              <input onChange={handleChangeFolderValues} className='border-2' type="text" id='title' required />
            </div>
            <div>
              <label htmlFor="description">Description: </label>
              <textarea onChange={handleChangeFolderValues} id='description' required cols={20} rows={5} className='border-2'></textarea>
            </div>
            <button type='submit'>SUBMIT</button>
          </form>
        </div>
      }
      {/* {
        foldersFetched?.length == 0 ?
        <div>
          <h1>No Folders</h1>
        </div>
        : 
        foldersFetched.map((folder, index) => {
          return (
            <div key={index}>
              {folder.title}
            </div>
          )
        })
      } */}
    </div>
  )
}
