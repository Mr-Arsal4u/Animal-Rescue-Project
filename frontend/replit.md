# Animal Rescue Adoption Platform

## Overview

This is a modern full-stack web application for an animal rescue organization called "Rescue The Voiceless". The platform helps connect abandoned and rescued animals with loving families through an intuitive adoption process. Built with React on the frontend and Express on the backend, it features an interactive animal gallery, success stories showcase, and streamlined adoption workflow.

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Frontend Architecture
- **React 18** with TypeScript for type safety and modern component patterns
- **Vite** as the build tool and development server for fast hot module replacement
- **Wouter** for lightweight client-side routing instead of React Router
- **Tailwind CSS** with custom design system using CSS variables for theming
- **Framer Motion** for smooth animations and micro-interactions throughout the UI
- **shadcn/ui** component library built on Radix UI primitives for accessible, customizable components
- **TanStack React Query** for server state management and API data fetching
- **React Hook Form** with Zod validation for type-safe form handling

### Component Structure
- Modular component architecture with separate folders for different page sections (animals, stories, process, home)
- Custom UI components built on Radix primitives for consistency and accessibility
- Reusable animation patterns and intersection observer hooks for scroll-based interactions
- Mock data structure prepared for real API integration

### Backend Architecture
- **Express.js** server with TypeScript for API endpoints
- Modular route registration system with centralized error handling
- **Storage abstraction layer** with interface-based design supporting both memory storage (current) and database implementations
- Development middleware for request logging and error handling
- **Vite integration** for seamless development experience with SSR capabilities

### Database Design
- **PostgreSQL** database with **Drizzle ORM** for type-safe database operations
- **Neon Database** integration for serverless PostgreSQL hosting
- Schema includes:
  - `animals` table with breed, age, size, energy level, availability status
  - `adoption_applications` table for processing adoption requests
  - `stories` table for success story management
- Zod schema validation ensuring data consistency between frontend and backend

### Styling and Design System
- **Tailwind CSS** configuration with custom color palette and design tokens
- CSS custom properties for theme consistency (primary orange, secondary blue)
- Responsive design with mobile-first approach
- Custom animations and transitions using Framer Motion
- Dark mode support built into the design system

### Development Tools
- **TypeScript** with strict configuration for type safety across the entire stack
- **ESBuild** for production bundling and optimization
- Path aliases configured for clean imports (`@/`, `@shared/`)
- **PostCSS** with Autoprefixer for CSS processing

## External Dependencies

### Database and Hosting
- **Neon Database** - Serverless PostgreSQL database hosting
- **Drizzle Kit** - Database migrations and schema management

### UI and Animation Libraries
- **Radix UI** - Accessible component primitives for all interactive elements
- **Framer Motion** - Animation library for smooth transitions and micro-interactions
- **Lucide React** - Icon library for consistent iconography

### Form and Validation
- **React Hook Form** - Performant form library with minimal re-renders
- **Zod** - TypeScript-first schema validation
- **@hookform/resolvers** - Integration layer between React Hook Form and Zod

### State Management and Data Fetching
- **TanStack React Query** - Server state management with caching and synchronization
- **Wouter** - Lightweight routing library

### Development and Build Tools
- **Vite** - Frontend build tool and development server
- **@replit/vite-plugin-runtime-error-modal** - Enhanced error reporting in development
- **@replit/vite-plugin-cartographer** - Development tooling for Replit environment

### Utility Libraries
- **clsx** and **tailwind-merge** - Conditional CSS class management
- **date-fns** - Date manipulation utilities
- **nanoid** - Unique ID generation